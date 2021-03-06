$(document).on("submit", "form", function() {

    var pt_input = document.getElementById('pt_source'),
        g_input = document.getElementById('g_source');

    console.log(pt_input.files[0], g_input.files[0]);

    let formdata = new FormData(document.getElementById('form'))

    formdata.append( 'pt_source', pt_input.files[0] );
    formdata.append( 'g_source', g_input.files[0] );

    function downloadURI(uri, name)
    // функция скачивания файла шифр-текста
    {
        var link = document.createElement("a");
        link.setAttribute('download', name);
        link.href = uri;
        document.body.appendChild(link);
        link.click();
        link.remove();
    }

    function loadFile(filePath)
    // функция чтения файла шифр-текста
    {
        let result = null;
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", filePath, false);
        xmlhttp.send();
        if (xmlhttp.status === 200) {
            result = xmlhttp.responseText;
        }
        return result;
    }

    $.ajax({
        type: "POST",
        url: "input.php",
        dataType: "html",
        data: formdata,
        contentType: false,
        processData: false,
        success: function() {

            console.log(loadFile('file.txt'));
            downloadURI(
                'file.txt',
                loadFile('file.txt').toString().replace(/\s+/g, '').trim().toLowerCase() +
                '.txt'
            );

            swal({
                title: "Succesfully registered!",
                icon: "success",
            }).then(() => {
                location.reload();
            });

        },
        error: function(xhr) {

            swal({
                title: xhr.statusText,
                icon: "error",
            });
            
        }
    }).done(function(result)
    {
        console.log(result);
    });

    return false;
})