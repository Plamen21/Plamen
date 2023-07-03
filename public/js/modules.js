$(document).ready(function() {
    $('#courses').on('change', function() {
        let id = $(this).val();
        let url = '/modules/' + id;
        if (id) {
            $.get(url, function(modules) {
                let modulesHtml = '<option value=""> Select module</option>';
                for (const module of modules) {
                    modulesHtml += '<option value="' + module.id + '">' + module.module_name + '</option>';
                }
                $('#modules').html(modulesHtml);
            });
        } else {
            $('#modules').html('<option value="">Select module</option>');
            $('#lectures').html('<option value="">Select lecture</option>');
        }
    });
});
