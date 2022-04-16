//toggle of the more description button

document.getElementById('more--description').addEventListener('click', function () {
    toggle(document.querySelectorAll('.description'));
  });

  function toggle (elements) {
    var element, index;

    elements = elements.length ? elements : [elements];
    for (index = 0; index < elements.length; index++) {
        element = elements[index];

        if (isElementHidden(element)) {
            element.style.display = '';

            // If the element is still hidden after removing the inline display
            if (isElementHidden(element)) {
            element.style.display = 'block';
            }
    } else {
            element.style.display = 'none';
    }
    }

    function isElementHidden (element) {
        return window.getComputedStyle(element, null).getPropertyValue('display') === 'none';
    }
  }