<!DOCTYPE html>
<html>
<head>
    <title>updation</title>
    <style>
      table
      {
        border: 2px solid black;
      }
    </style>
</head>
<body class="bi">
   

<div style="margin-top:100px;font-size:30px">
    <h1>BOOK ISSUE</h1>
    </div>
</div>
    <a href="<?php echo base_url()?>main/adash">Back To dashboard</a>
    <form action="<?php echo base_url()?>main/issueb" method="POST">
      <table>
      <thead>
        <tr>  
        <th> Name</th>
        <th>Book Name</th>
        <th> Book ID</th>
        <th>Author Name</th>
        <th>Date</th>
        <th>Last Date</th>
        </tr> 
          <?php
        if(isset($user_data))
        {
            foreach($user_data->result() as $row) 
            {
                ?>
                <tr>
                  <td><?php echo $row->name;?></td>
                  <td><?php echo $row->bname;?></td>
                  <td><?php echo $row->bid;?></td>
                  <td><?php echo $row->date;?></td>
                  <td><?php echo $row->rdate;?></td>
                </tr>
              <?php
                  }
              }?>
          </tr>
      </thead>
    </table>
      
   </form>
</body>
</html>