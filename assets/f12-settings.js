$(document).on('change', '#f12-settings-form', function () {
    $('.f12-setting-submit-block').addClass('visible');
});

$(document).on('keyup', '#f12-settings-form', function () {
    $('.f12-setting-submit-block').addClass('visible');
});

const fileInputs = document.querySelectorAll('div.floor12-files-widget-list');
const fileInputsChildren = []


// show $('.f12-setting-submit-block').addClass('visible');
// when number of children of fileInputs is changed
function initFileInputWatcher(fileInputs) {
    fileInputs.forEach(fileInput => {
        fileInputsChildren.push(fileInput.children.length)
    })

    const observer = new MutationObserver((mutationsList, observer) => {
        for (let mutation of mutationsList) {
            if (mutation.type === 'childList') {
                if (mutation.target.children.length !== fileInputsChildren[0]) {
                    $('.f12-setting-submit-block').addClass('visible');
                }
            }
        }
    })

    fileInputs.forEach(fileInput => {
        observer.observe(fileInput, { childList: true })
    })
}

initFileInputWatcher(fileInputs)