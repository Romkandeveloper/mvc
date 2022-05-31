(function (){
    //set calendar plugin
    $('input[name="date"]').daterangepicker({
        singleDatePicker: true,
        timePicker: true,
        minDate: new Date(),
        locale: {
            format: 'M/DD hh:mm A'
        }
    });
})();
