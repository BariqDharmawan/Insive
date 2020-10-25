function getText(parent, target) {
    return parent.find(target).text().trim();
}

function setValue(parent, target, value) {
    return parent.find(target).val(value);
}

function currentNav(navId) {
    let current = window.location.href.split('#')[0],
        nav = document.getElementById(navId),
        navItem = nav.getElementsByTagName('a');

    Array.from(navItem).filter(link => {
        if (link.href == current || link.href == decodeURIComponent(current)) link.classList.add("active")
    });
}

function getSheetQtyInput(fromElement) {
    return fromElement.parent().find('.sheet__qty');
}

const disableEvent = (e) => e.preventDefault();

export {
    getText,
    setValue,
    currentNav,
    disableEvent,
    getSheetQtyInput
};
