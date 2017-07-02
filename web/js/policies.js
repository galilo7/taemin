function clearFile(modelId) {
    deleteUrl = 'delete-file';
//    alert();

    $.ajax({
    url: deleteUrl,
            type: 'post',
            data: {
            id : modelId,
            },
            success: function (data) {
                result = data.result; 
                    alert(result);
            },
            error: function () {
            alert("حصل خطأ أثناء حذف الملف ");
            }
    }); 

    return;              // The function returns the product of p1 and p2
}