

$(document).ready(function(){

    // Activation des ttoltype bootstrap
    $('[data-toggle="tooltip"]').tooltip();
    // Definition des options de BootstrapBox par default
    /*
    $('#MyButton').click(function(){
        CapacityChart();
    });
    */
});

var app = angular.module('app', ['file-model']);


var togglePermission = function(rolId, permName, siteUrl){

    window.location.href = 'role/'+rolId+'/togglperm/'+permName;
};

var confirmeDelet =  function(refName, refId){

    bootbox.setDefaults({

        locale: "fr",
        backdrop: true

    });

    bootbox.confirm({
        size: 'small',
        message: "Êtes-vous sure de vouloir supprimer cet enregistrement ?",
        locale: "fr",
        callback: function(result) {
            console.log(result);
            if(result==true){
                console.log(refName+refId);
                document.forms[refName+refId].submit();
            }
        }

    });
};