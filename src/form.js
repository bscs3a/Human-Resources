window.addEventListener('DOMContentLoaded', (event) => {
    const forms = document.querySelectorAll('form');
    const pathSegments = window.location.pathname.split('/');
    const rootFolder = pathSegments.length > 1 ? pathSegments[1] : '';

    forms.forEach(form => {
        const existingAction = form.getAttribute('action');
        form.action = `/${rootFolder}${existingAction}`;
    });
    console.log(forms);
});