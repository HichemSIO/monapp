<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">nom</th>
      <th scope="col">prenom</th>
      
    </tr>
  </thead>
  <body>
    
<?php foreach ($les_membres as $k => $valeur): ?>

    <tr>  
    <th scope="row"> 
        <?php echo $valeur['id'];?>
        </th>  
     
        <td> 
        <?php echo $valeur["nom"];?>
        </td>  

        <td> 
        <?php echo $valeur["prenom"];?>
     </td>  

    </tr>

    <?php endforeach; ?>
    
  </body>
</table>
