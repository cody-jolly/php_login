function loadContent(content)
{
    $.get(content + '/' + content + 'Content.php', function(data) {
        $('#contentArea').html(data);
    });
}

function addItem(subType) {
    //subType 1 -> itemInfo

    globalAlertRest();
    let dataElementArr = [];
    let dataObject = {};
    let dataComplete = true;

    if (subType == 1) {
        //console.log('subtype 1');
        dataObject.func = 'addNewItemInfo';

        //get info from input fields
        let itemName = $('#ip_itemName');
        let itemNumber = $('#ip_itemNumber');
        let description = $('#ip_description');
        let massWidth = $('#ip_massWidth')
        let massHeight = $('#ip_massHeight');
        let massDepth = $('#ip_massDepth');
        let weight = $('#ip_weight');
        let status = $('#ip_status');
        let itemGroup = $('#ip_itemGroup');

        //push info into dataElement and dataObject
        dataElementArr.push(itemName, itemNumber, description, massWidth, massHeight,
                    massDepth, weight, status, itemGroup);
    }

    for (let i = 0; i < (dataElementArr.length); i++) {
        let el = dataElementArr[i];
        //simple validation
        if(el.val().length > 0 && !(el.val() == '0') && !(el.val() == 'Availability')) {
            el.removeClass('border-danger');
            dataObject[el.attr('data')] = el.val();
        } else {
            el.addClass('border-danger');
            dataComplete = false;
        }
    }


    if(dataComplete)
     {
         //all fields complete
         $.ajax({
             url: 'addNewItem.php',
             type: 'post',
             async: true,
             data: dataObject,
             beforeSend: function(){
             }
         }).done(function (feedback)
         {
             //decode JSON feedback
             let jsFeedback = JSON.parse(feedback);
             console.log(jsFeedback);
             if(jsFeedback[0] == 1)
             {
                 globalAlertController(4,"Item information successfully added!");
                 $('#ip_itemName').val('');
                 $('#ip_itemNumber').val(jsFeedback[1]);
                 $('#ip_description').val('');
                 $('#ip_massWidth').val('');
                 $('#ip_massHeight').val('');
                 $('#ip_massDepth').val('');
                 $('#ip_weight').val('');
                 $('#ip_status').val('Availability');
                 $('#ip_itemGroup').val('0');
             }
             else
             {
                 globalAlertController(3,"Error occurred while adding items!");
             }
         });
     }
     else
     {
         //fields incomplete
         globalAlertController(3,"Please complete all entries!");
     }
}