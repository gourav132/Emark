<div class=" bg-white shadow rounded p-2">
    <h3 class="ml-2">Make announcement</h3>
    <form class="form-floating m-2">
        <div class="mb-2">
            <label for="title" class="form-label">Title</label>
            <input onfocus="removeValidation('title')" type="text" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Title...">
        </div>

        <div class="mb-3">
            <label for="body-message" class="form-label">Body</label>
            <textarea onfocus="removeValidation('body-message')" class="form-control" placeholder="Message..." id="body-message" style="height: 100px"></textarea>
        </div> 

        <div class="ajax-purpose"></div>
        <div class="message"></div>

        <button onclick="validate()" type="button" class="button btn btn-primary mt-2">Submit</button>

        <button class="load btn btn-primary d-none" type="button" disabled>
            <span class="spinner-border spinner-border-sm mb-1" role="status" aria-hidden="true"></span>
            Loading...
        </button>
    </form>
</div>

<div class="bg-white shadow rounded p-2 mt-3 mb-3">
    <h3 class="ml-2">Announcements</h3>
    <div class="delete-announcement"></div>
    <div class="announcement-message"></div>
    <div class="announcementsTable"></div>
</div>



<!-- Delete modal -->
<div id="modal-example" uk-modal>
    <div class="uk-modal-dialog uk-modal-body rounded shadow">
        <h4 class="uk-text-center">Are you sure you want to delete the announcement?</h4>
        <p class="uk-text-right">
            <button class="uk-button uk-button-default rounded uk-modal-close" type="button">Cancel</button>
            <button onclick="del()" class="uk-button rounded uk-button-danger uk-modal-close" type="button">Detele</button>
        </p>
    </div>
</div>


<script>

    $(".announcementsTable").load("Ajax/announcement_table.php");
    function validate(){
        var title = document.getElementById("title");
        var body = document.getElementById("body-message");

        if(title.value == ""){
            $("#title").addClass("is-invalid");
        }
        if(body.value == ""){
            $("#body-message").addClass("is-invalid");
        }
        if(body.value != "" && title.value != ""){
            $(".button").addClass("d-none");
            $(".load").removeClass("d-none");
            $(".ajax-purpose").load("Process/announcement.php",{title: title.value, body: body.value, submit: "set"},function(){
                $(".message").load("message/message.php",{}, function(){
                    $(".announcementsTable").load("Ajax/announcement_table.php",{},function() {
                        $(".button").removeClass("d-none");
                        $(".load").addClass("d-none");
                    });

                });

            });
        }
    }

    function removeValidation(para){
        document.getElementById(para).classList.remove("is-invalid");
    }

    var announcementId;

    function initialize(param){
        announcementId = param
    }

    function del(){
        $(".delete-announcement").load("Process/deleteAnnouncement.php",{id: announcementId, submit: "set"}, function(){
            $(".announcementsTable").load("Ajax/announcement_table.php",{},function(statusTxt){
                $(".announcement-message").load("message/message.php",{},function(){});
            });
        });
    }
</script>