$(document).ready(function() {
    $('#lectures').on('change', function() {
        let courseId = $('#courses').val();

        let url = '/date/' + courseId;
        $.get(url, function(data) {
            let row = data[0];
            let startDate = new Date(row.start_date);
            let endDate = new Date(row.end_date);

            let randomDate = new Date(startDate.getTime() + Math.random() * (endDate.getTime() - startDate.getTime()));
            let formattedDate = randomDate.toISOString().slice(0, 10); // Преобразуване във формат YYYY-MM-DD

            $('#scheduleDate').text(formattedDate);
        });
    });

    $('#courses, #modules').on('change', function() {
        $('#scheduleDate').text('-');
    });
});
