/* Date - Mask */

var dataNasc = IMask(document.getElementById('dataNasc'), {
    mask: Date,
    lazy: true,
    autofix: true,
    blocks: {
        d: {mask: IMask.MaskedRange, from: 1, to: 31, maxLength: 2},
        m: {mask: IMask.MaskedRange, from: 1, to: 12, maxLength: 2},
        Y: {mask: IMask.MaskedRange, from: 1945, to: 2036, maxLength: 4}
    }
})

