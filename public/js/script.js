function myFunction(etudiants){
    console.log(document.getElementById("datePicker").value);
    $.ajax({
        dataType : "json",
        url: '/html/Projet_tutorat/site/getComboboxHoraires.php',
        type: 'POST',
        data: {date:document.getElementById("datePicker").value,etudiants:etudiants},
        success : function(result) {
            console.log("success !!!");
            $("#comboboxHoraires").empty();
            $.each(result, function(index, value)
            {
                $("#comboboxHoraires").append("<option value="+ value +">"+ value +"</option>");
            });
            $("#comboboxHoraires").focus();

        },
    });
}
function myFunction2(){

    var checkboxes = document.getElementsByName('etudiantRef');
    var etudiants = new Array();
    var options;
    for (var i=0; i<checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            etudiants.push(checkboxes[i].value);
        }
    }

    $.ajax({
        dataType : "json",
        url: '/projet_tutorat2/public/ajax/getComboboxHoraires.php',
        type: 'POST',
        data: {date:document.getElementById("datePicker").value,etudiants:etudiants},
        success : function(result) {
            console.log("success !!!");

            $.each(result, function(index, value)
            {
                options = options+"<option value="+ value +">"+ value +"</option>";
            });
            //$("#comboboxHoraires").focus();
            $('#comboboxHoraires').empty();
            $('#comboboxHoraires').append(options);
            $("#comboboxHoraires").formSelect()
        },
    });
}