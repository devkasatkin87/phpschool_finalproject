var num = 10;

function funcSuccessAuthors(data) {
    $("#authors").append(data);
    num += 10;
}

function funcSuccessDates(data) {
    $("#dates").append(data);
    num += 10;
}

$(document).ready(function () {
    
    $("#loadNextAuthors").bind("click", function () {
        $.ajax({
            url: "/src/components/pagination/paginationAuthors.php",
            type: "POST",
            data: {num: num},
            dataType: "html",
            success: funcSuccessAuthors
        });
    });
    
    $("#loadNextDates").bind("click", function () {
        $.ajax({
            url: "/src/components/pagination/paginationDates.php",
            type: "POST",
            data: {num: num},
            dataType: "html",
            success: funcSuccessDates
        });
    });

});

