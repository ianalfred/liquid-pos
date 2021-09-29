document.getElementById('switchTheme').addEventListener('click', function() {
    let htmlClasses = document.querySelector('html').classList;
    if(localStorage.theme == 'dark') {
        htmlClasses.remove('dark');
        localStorage.removeItem('theme');
    } else {
        htmlClasses.add('dark');
        localStorage.theme = 'dark';
    }
})

document.getElementById('switchTheme2').addEventListener('click', function() {
    let htmlClasses = document.querySelector('html').classList;
    if(localStorage.theme == 'dark') {
        htmlClasses.remove('dark');
        localStorage.removeItem('theme');
    } else {
        htmlClasses.add('dark');
        localStorage.theme = 'dark';
    }
})