((
  d,
  c = d.createElement('b').style,
  a = (c.gap = 0),
  polyfillList = new WeakMap(),
  ungapful = /^(normal|0px)+$/,
  polyfillNode = (element) => {
    if (polyfillList.has(element)) return;
    polyfillList.set(element, true);
    if (element.shadowRoot) return;
    const ecss = getComputedStyle(element);
    if (
      /^(inline-)?flex$/.test(ecss.display) &&
      !ungapful.test(ecss.rowGap + ecss.columnGap)
    ) {
      const shadowRoot = element.attachShadow({ mode: 'open' });
      const shadowEcss = shadowRoot.appendChild(d.createElement('style'));
      const shadowSlot = shadowRoot.appendChild(d.createElement('slot'));
      const onFrameSkip = () => {
        shadowEcss.textContent = `::slotted(*){margin:calc(${ecss.rowGap}/2) calc(${ecss.columnGap}/2)}slot{display:inherit;flex-direction:inherit;flex-wrap:inherit;margin:calc(${ecss.rowGap}/-2) calc(${ecss.columnGap}/-2);}`;
        requestAnimationFrame(requestAnimationFrame.bind(null, onFrameSkip));
      };
      onFrameSkip();
    }
  },
  polyfillInit = () => {
    Array.from(d.all, polyfillNode);
    let mo = new MutationObserver((records) => {
      for (const { addedNodes } of records) {
        for (const addedNode of addedNodes) {
          if (addedNode.nodeType === 1) {
            polyfillNode(addedNode);
          }
        }
      }
    });
    mo.observe(d, { childList: true, subtree: true });
  }
) => c.gap || polyfillInit())(document);
