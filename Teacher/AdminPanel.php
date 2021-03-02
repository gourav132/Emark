<div>
<style>

  .cards{
    border-radius: 8px;
    color: white;
    cursor: pointer; 
  }


</style>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h2 mb-0 text-gray-800">Dashboard</h1>
</div>


    <div onclick = "" class="cards uk-card uk-card-primary uk-card-body mb-3" style="background-color: #a29bfe">
        <h3 class="uk-card-title">Announcements</h3>
        <h5 class="uk-margin-remove-bottom uk-margin-remove-top ">1.Title</h5>
        <p class="uk-margin-remove-top">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ab laboriosam atque ea error animi assumenda...</p>
        <h5 class="uk-margin-remove-bottom uk-margin-remove-top ">1.Title</h5>
        <p class="uk-margin-remove-top">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ab laboriosam atque ea error animi assumenda nulla...</p>
    </div>

<div class="uk-child-width-1-4@m uk-child-width-1-2 uk-grid-small uk-grid-match" uk-grid>
    <div>
        <div onclick = "AddClass('Ajax/AddClass.php')" class="cards uk-card uk-card-primary uk-card-body" style="background-color: #a29bfe">
            <h3 class="uk-card-title">Manage class</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>
    </div>
    <div>
        <div onclick = "AddClass('Ajax/AddSection.php')" class="cards uk-card uk-card-primary uk-card-body" style="background-color: #74b9ff">
            <h3 class="uk-card-title">Manage section</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>
    </div>
    <div>
        <div onclick = "AddClass('Ajax/AddTerm.php')" class="cards uk-card uk-card-secondary uk-card-body" style="background-color: #fab1a0">
            <h3 class="uk-card-title">Manage terms</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>
    </div>
    <div>
        <div onclick = "AddClass('Ajax/AddSubject.php')" class="cards uk-card uk-card-primary uk-card-body" style="background-color: #81ec90">
            <h3 class="uk-card-title">Manage subjects</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>
    </div>
</div>

<div class="uk-child-width-1-3@m uk-grid-small uk-grid-match" uk-grid>
    <div>
        <div onclick = "AddClass('Ajax/ClassWithSection.php')" class="cards uk-card uk-card-primary uk-card-body" style="background-color: #00cec9">
            <h3 class="uk-card-title">Class with section</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>
    </div>
    <div>
        <div onclick = "AddClass('Ajax/ClassWithSubject.php')" class="cards uk-card uk-card-primary uk-card-body" style="background-color: #6c5ce7">
            <h3 class="uk-card-title">Class with subjects</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>
    </div>
    <div>
        <div onclick = "AddClass('Ajax/ClassWithTerm.php')" class="cards uk-card uk-card-secondary uk-card-body" style="background-color: #00b894">
            <h3 class="uk-card-title">Class with terms</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>
    </div>
</div>


<script>

  function checking(){

    alert();

  }

</script>