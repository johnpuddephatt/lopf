(function () {
  const headings = document.querySelectorAll(
    '.wp-block-person .wp-block-columns'
  );

  Array.prototype.forEach.call(headings, (heading) => {
    let btn = heading.querySelector('button');
    let target = heading.nextElementSibling;

    target.hidden = true;

    btn.onclick = () => {
      let expanded = btn.getAttribute('aria-expanded') === 'true' || false;

      btn.setAttribute('aria-expanded', !expanded);
      target.hidden = expanded;
    };
  });
})();
