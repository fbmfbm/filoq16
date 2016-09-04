

$(document).ready(function(){


    $('[data-toggle="tooltip"]').tooltip()


    $('#MyButton').click(function(){
        CapacityChart();
    });
});

var togglePermission = function(rolId, permName, siteUrl){

    window.location.href = 'role/'+rolId+'/togglperm/'+permName;
}

var confirmeDelet =  function(refName, refId){
    bootbox.confirm("Êtes-vous sure de vouloir supprimer cet enregistrement ?", function(result) {
        console.log(result);
        if(result==true){
            console.log(refName+refId);
            document.forms[refName+refId].submit();
        }
    });
};