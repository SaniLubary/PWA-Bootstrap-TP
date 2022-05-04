var tl = gsap.timeline({
  repeat: -1,
});

// bata
tl.to('gato-1', {
  opacity: 0,
  display: 'block',
}).to("#gato-1", {
  duration: 0.1,
  opacity: 1,
}).to("#gato-1", {
  duration: 0.1,
  opacity: 0,
}, "+=2").to("#gato-1", {
  display: 'none'
})

// corbata
tl.to("#gato-2", {
  display: 'block'
}, "<").to("#gato-2", {
  duration: 0.1,
  opacity: 1,
}).to("#gato-2", {
  duration: 0.1,
  opacity: 0,
}, "+=2").to("#gato-2", {
  display: 'none'
})

// comfy
tl.to("#gato-3", {
  display: 'block'
}, "<").to("#gato-3", {
  duration: 0.1,
  opacity: 1,
}).to("#gato-3", {
  duration: 0.1,
  opacity: 0,
}, "+=2").to("#gato-3", {
  display: 'none'
})