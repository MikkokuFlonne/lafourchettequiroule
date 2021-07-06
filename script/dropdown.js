if (document.getElementById('user') != 'undefined' && document.getElementById('user') != null) {


    document.getElementById('user').addEventListener("mouseover", function (e) {
        document.querySelector('#menu-user').style.display = "flex";
    })
    document.querySelector('#menu-user').addEventListener('mouseleave', function () {
        document.querySelector('#menu-user').style.display = "none";

    })
}

document.getElementById('popup').addEventListener('click', function () {
    document.getElementById('compte').style.display = 'flex';
})

function changeTab(tab) {
    document.getElementById('tab-' + tab).addEventListener('click', function () {
        let childCompt = document.getElementById('compte').children;

        for (const el of childCompt) {
            if (el.nodeName === 'DIV') {
                el.style.display = 'none';
            } else if (el.nodeName === 'UL') {
                for (const child of el.children) {
                    if (child.id === ('tab-' + tab)) {
                        child.style.backgroundColor = 'brown';
                        child.style.boxShadow = 'none';


                    } else {

                        child.style.backgroundColor = 'rgb(119, 43, 43)';
                        if (tab === 'connexion') {
                            child.style.boxShadow = 'inset 5px -5px 10px -4px black';
                        } else {
                            child.style.boxShadow = 'inset -5px -5px 10px -4px black';
                        }
                    }
                }
            }
        }
        document.getElementById(tab).style.display = 'flex';
    })
}

changeTab('connexion');
changeTab('inscription');

document.getElementById('close-popup').addEventListener('click', x =>{
    document.getElementById('compte').style.display = 'none';
})