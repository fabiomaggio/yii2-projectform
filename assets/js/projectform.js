$(document).ready(function() {
    
    // Eventhandlers
    $(document)
        .on('click', '.toggler', toggleSettings)
        .on('click', '#forms-toggler', toggleForms)
        .on('click', '#btn-add-form', addForm)
        .on('click', '.btn-delete-form', deleteForm);    
});

function toggleSettings(e) {
    var toggle = $(this).data('toggle'),
        checked = $(this).prop('checked');        
    
    $('[data-toggler='+toggle+']').prop('checked', checked);    
}

function toggleForms(e) {
    var checked = $(this).prop('checked');
    
    if (checked) {
        $('#btn-add-form').show().trigger('click');
    } else {
        $('#btn-add-form').hide();
        $('#forms-container').empty();   
    }
}

function addForm(e) {
    
    e.preventDefault();
    
    var template = _.template($("#template-form-name").html()),
        html = template({});
    
    $('#forms-container').append(html);
}

function deleteForm(e) {
    
    e.preventDefault();
    
    $(this).parent().remove();
    
    // If there are no more forms left, disable the forms toggler
    if (!$('.form-name-input').length)
        $('#forms-toggler').trigger('click');
}

/*(function (root, factory) {
    root.projectform = factory();             
})(this, function() {
    
    'use strict';
    
    var projectform = {};
    
    projectform.init = function() {
        projectform.setEventhandlers();        
    };
    
    projectform.setEventhandlers = function() {
        $(document)
            .on('click', '.toggler', projectform.toggleSettings)
            .on('click', '#checkbox-forms', projectform.toggleForms);
    };
    
    projectform.toggleSettings = function(e) {

        var toggle = $(this).data('toggle'),
            checked = $(this).prop('checked');        
        
        $('[data-toggler='+toggle+']').prop('checked');        
    };
    
    projectform.toggleForms = function(e) {
        if ($(this).prop('checked') === true) {
            $('#btn-add-form').show();    
        } else {
            $('#btn-add-form').hide();
        }
    };
    
    return projectform;    
});

$(document).ready(function() {
    projectform.init();
});*/