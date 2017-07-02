function clearFile(modelId) {
    deleteUrl = 'delete-file';
    alert(deleteUrl);

    $.ajax({
    url: deleteUrl,
            type: 'post',
            data: {
            id : modelId,
            },
            success: function (data) {
                    if (data.result){
                    alert("تم حذف اتلملف");
                    }
                    else {
                    alert("حصل خطأ أثناء حذف الملف");
                     }
            },
            error: function () {
            alert("حصل خطأ أثناء حذف الملف error");
            }
    });

    return;              // The function returns the product of p1 and p2
}