function globalAlertController(level, message)
{
    if(level == 1)
    {
        $('#alert1').removeClass('d-none');
        $('#alert1message').html(message);
    }

    if(level == 2)
    {
        $('#alert2').removeClass('d-none');
        $('#alert2message').html(message);
    }

    if(level == 3)
    {
        $('#alert3').removeClass('d-none');
        $('#alert3message').html(message);
    }

    if(level == 4)
    {
        $('#alert4').removeClass('d-none');
        $('#alert4message').html(message);
    }
}

function globalAlertRest()
{
    $('#alert1').addClass('d-none');
    $('#alert2').addClass('d-none');
    $('#alert3').addClass('d-none');
    $('#alert4').addClass('d-none');
}