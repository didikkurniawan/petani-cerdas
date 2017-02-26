$(document).ready(function () {
    Vue.directive('validate', function (el, binding) {
        $(el).validate();
    });

});