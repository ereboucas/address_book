var sort_field = 'last_name';
var sort_order = 'asc';

function entries_reload() {
  $('#entries > tbody').empty();
  $.get(
    'people.php?action=list&sort=' + sort_field + '&order=' + sort_order,
    function(data) {
      for (var i in data) {
        var html = '<tr>';
        for (var k in data[i]) {
          if (k != 'id')
            html += '<td>' + data[i][k] + '</td>';
        }
        html += '<td><a href="#" class="person_edit" data-id="' + data[i]['id'] + '">Edit</button></td>';
        html += '<td><a href="#" class="person_delete" data-id="' + data[i]['id'] + '">Delete</button></td>';        
        html += '</tr>';
        $('#entries > tbody:last').append(html);
      }
    }
  );
}

function entry_show() {
  var maskHeight = $(document).height();
  var maskWidth = $(window).width();
  $('#mask').css({'width':maskWidth,'height':maskHeight});
  $('#mask').fadeIn(100);
  $('#mask').fadeTo('slow', 0.8);
  var winH = $(window).height();
  var winW = $(window).width();
  $('#entry').css('top',  winH/2-$('#entry').height()/2);
  $('#entry').css('left', winW/2-$('#entry').width()/2);
  $('#entry').fadeIn(100);  
}

function entry_hide() {

  $('#entry').hide();
  $('#mask').hide();
}

$(document).ready(function() {

  $('#person_add').click(function() {
    $('#form').each(function() {
      this.reset();
    });
    $('#id').val('');
    entry_show();
    return false;
  });

  $('.person_edit').live('click', function() {
    $.get(
      'people.php?action=edit&id=' + $(this).data('id'),
      function(data) {
        for (var k in data[0]) {
          $('#' + k).val(data[0][k]);
        }
        entry_show();        
      }
    );
    return false;
  });

  $('.person_delete').live('click', function() {
    $('#entry').hide();  
    if (confirm('Are you sure?')) { 
      $.get(
        'people.php?action=delete&id=' + $(this).data('id'),
        function(data) {
          entries_reload();
        }
      );
    }
    return false;
  });

  $('#person_save').click(function() {
    var action = 'add';
    if ($('#id').val() != '') {
      action = 'update';
    }
    $.get(
      'people.php?action=' + action,
      $('#form').serialize(),
      function(data) {
        entries_reload();
        entry_hide();
      }
    );
    return false;
  });

  $('#person_cancel').click(function() {
    entry_hide();
    return false;
  });

  $('#entries th').click(function() {
    sort_field = $(this).data('field');
    entries_reload();
    return false;
  });
  
  entries_reload();
  
});
