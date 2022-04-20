$.ajax({
    url: "php/get-cat.php",
    method: "POST",
    data: { get_cat: 1 },
    success: function(data) {
        $(".db-categories").append(data);
        console.log(data)
    }
})