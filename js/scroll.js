const els = document.querySelectorAll('.cover-slide');
const cb = function(entries, observer) {
    entries.forEach(entry => {
        if(entry.isIntersecting) {
            entry.target.classList.add('inview');
            observer.unobserve(entry.target);
        } else {
            entry.target.classList.remove('inview');
        }
    });
    // alert('intersecting');
}
const options = {
    root: null,
    rootMargin: "50px 0px",
    threshold: [0.5]
};
const io = new IntersectionObserver(cb, options);
els.forEach(el =>io.observe(el));

