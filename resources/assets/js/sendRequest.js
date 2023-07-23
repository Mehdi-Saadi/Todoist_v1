export function sendRequest(type, url, data, success) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
            'Content-Type': 'application/json'
        }
    });

    $.ajax({
        type: type,
        url: url,
        data: JSON.stringify(data),
        success: success,
        error: function () {
            toast_alert('error', 'Sorry, there is an error...');
        }
    });
}
