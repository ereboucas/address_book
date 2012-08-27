<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Avaaz - Address book</title>
  <link rel="stylesheet" type="text/css" href="css/address.css">
</head>
<body>

  <div id="mask"></div>

  <div id="entry">

    <form action="" id="form" >
      
      <input type="hidden" id="id" name="id" value="">
          
      <div>
        <label>Last Name</label>
        <div><input type="text" id="last_name" name="last_name" maxlenght="60"></div>
      </div>

      <div>
        <label>First Name</label>
        <div><input type="text" id="first_name" name="first_name" maxlenght="60"></div>
      </div>

      <div>
        <label>Country</label>
        <div><input type="text" id="country" name="country" maxlenght="60"></div>
      </div>

      <div>
        <label>City</label>
        <div><input type="text" id="city" name="city" maxlenght="60"></div>
      </div>

      <div>
        <label>Address</label>
        <div><input type="text" id="address" name="address" maxlenght="60"></div>
      </div>

      <div>
        <label>Email</label>
        <div><input type="text" id="email" name="email" max-lenght="60"></div>
      </div>

      <a href="#" id="person_save">Save</a>
      
      <a href="#" id="person_cancel">Cancel</a>

     </form>

  </div>

  <div>
  
    <h1>Address Book</h1>

    <p>Click on column name to sort</p>
        
    <div id="content">
    
      <table id="entries">
        <thead>
          <tr>
            <th data-field="last_name">Last name</th>
            <th data-field="first_name">First name</th>
            <th data_field="country">Country</th>
            <th data_field="city">City</th>
            <th data_field="address">Address</th>
            <th data_field="email">Email</th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
        </tbody>
      </table>
      
    </div>

    <a href="#" id="person_add">Add person</a>

  </div>

  
</body>

<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/address.js" type="text/javascript"></script>

</html>

