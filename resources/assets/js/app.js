var msg = "Test d'une nouvelle app actualisée !";


console.log(msg);

// Initialize tooltip component
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

// Initialize popover component
$(function () {
  $('[data-toggle="popover"]').popover()
})
 

var app = angular.module('app', ["openlayers-directive"]);
