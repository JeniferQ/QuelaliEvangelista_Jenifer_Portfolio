(() => {
    const burger = document.querySelector('#burger img'),
    menu = document.querySelector('#menu'),
    body = document.querySelector('body');

    const player = new Plyr('video');

    const projectCon = document.querySelector('#project-con'),
    projects = [
        { image: "images/placeholder.png", title: "Comet", description: "A premium earbud website featuring a real-time 3D model viewer for interactive product exploration.", color: "#2E385C" },
        { image: "images/placeholder.png", title: "Dr. Nut", description: "A complete rebrand and website build for a soft drink company from the 30’s.", color: "#D30006" },
        { image: "images/placeholder.png", title: "Kavorka", description: "A website made for a cosmetics brand focused on selling vegan beauty products.", color: "#F47F78" },
        { image: "images/placeholder.png", title: "Music Mixer", description: "A website constructed to simulate a boombox, featuring a music making interface.", color: "#C242DD" }
    ];
    
    function removeMenu() {
        body.style.overflow = 'auto';
        menu.classList.remove('open');
        burger.classList.remove('rotate');
    }
        
    function toggleMenu() {
        if (window.innerWidth <= 768) {
            menu.classList.toggle('open');
            burger.classList.toggle('rotate');
        
            if (menu.classList.contains('open')) {
                body.style.overflow = 'hidden';
            }

            else {
                console.log('close mobile menu');
                removeMenu(); }
        }
    }
    
    function resizeMenu() {
        if (window.innerWidth >= 768) {
            removeMenu();
        }
    }

    projects.forEach((project, index) => {
        const projectDiv = document.createElement("div");
        if (index % 2 == 0) { projectDiv.classList.add("col-span-full", "m-col-start-2", "m-col-end-7", "project") }
        else { projectDiv.classList.add("col-span-full", "m-col-start-7", "m-col-end-12", "project") };
    
        const imageCon = document.createElement("div");
        imageCon.classList.add("project-img", "shadow");

        const image = document.createElement("img");
        image.src = project.image;
        imageCon.appendChild(image);

        const projectTitle = document.createElement("h3");
        projectTitle.textContent = project.title;

        const projectDescription = document.createElement("p");
        projectDescription.textContent = project.description;

        const projectBtn = document.createElement("a");
        projectBtn.classList.add("point");
        projectBtn.style.color = project.color;
        projectBtn.textContent = 'Read Case Study';
        projectBtn.href = '#';

        const arrow = document.createElement("i");
        arrow.classList.add("fa-solid", "fa-arrow-right-long");
        projectBtn.appendChild(arrow);
    
        projectDiv.append(imageCon, projectTitle, projectDescription, projectBtn);
        projectCon.appendChild(projectDiv);
    });

    burger.addEventListener('click', toggleMenu);
    window.addEventListener('resize', resizeMenu);
})();

console.log('JS is working');