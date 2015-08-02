<?php require_once("core/connection.php"); ?>
<?php require_once("core/header.php"); ?>
<div data-role="page" data-theme="a">
    <div data-role="main" class="ui-content main-content">
     <?php require_once('core/topbar.php'); ?>

     <!-- drop-down list for searching on the basis of different search categories (fields)-->
     <select id="searchby">
        <option value="" selected disabled>Search by ... </option>
        <?php
        // loop through the $search_keys array that has the keys of searchable fields and generate dropdown options. on click, JS will enable searchbox to search data accordingly.
        foreach($search_keys as $key){
          echo "<option value=".$key.">".$fieldname[$key]."</option>";                    
      }
      ?>
  </select>
  <form class="ui-filterable">
    <input id="autocomplete-input" data-type="search" placeholder=<?php echo '"Search by '.$fieldname[$search_category].'"'; ?> >
</form>
<ul class="data-list" data-role="listview" data-filter="true" data-filter-reveal="true" data-input="#autocomplete-input" data-inset="true">
    <?php
    //Generates list of searchable items for search box. It will be hidden by default. When clicked, it will open info.php with id parameter and value of the key of the selected list item.
    if($search_category!=NULL){
        $i = 0;
        foreach ($all_data as $names){
            echo "<li id='".$name_keys[$i]."'><a href='info.php?id=".$name_keys[$i++]."'>".$names[$search_category]."<br><span><i>".$names[$name_index]."</i><span></a></li>";
        }
    }
    ?>
</ul>
</div>
<div style="text-align:center">
    <?php require_once('core/home-content.php'); // show the home-content.php page?>
</div>
<script type="text/javascript">

// When search category is selected from dropdownlist, reload page with updated value of search category index.
$("#searchby").change(function(){
    window.location.href= "home.php?s="+$(this).val();
});
</script>
<?php require_once("core/footer.php"); ?>