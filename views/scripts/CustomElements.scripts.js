const __ceMainTick__ = () =>{
    const ce = new CustomElements();
    ce.state.script.To();
    ce.state.script.ButtonSelection();
    ce.state.script.ImgPreview();
    setTimeout(__ceMainTick__, 1)
}

class CustomElements{
    constructor(props) {
        this.state = {
            props : props,
            temp : {},
            script : {
                To : ()=>this.#To(),
                ButtonSelection : ()=>this.#ButtonSelection(),
                ImgPreview : ()=>this.#ImgPreview(),
            }
        }
    }

    #To(){
        document.querySelectorAll('to').forEach(ele=>{
            if (!ele.classList.contains('is-link')) {
                ele.classList.add('is-link')
                ele.addEventListener('click', ()=>{
                    this.#_handleOnClick(ele)
                })
                this.state.temp = {
                    ele: ele,
                    selector : 'list'
                }
                if (this.#getParrents().length > 0) {
                    const _list = this.#getParrents()[0]
                    _list.querySelectorAll('to').forEach(to_in_list=>{
                        to_in_list.classList.remove('active')
                    })
                }
            }
        })
        document.querySelectorAll('to').forEach(ele=>{
            if (!ele.classList.contains('is-link')) {
                ele.classList.add('is-link')
                ele.addEventListener('click', ()=>{
                    this.#_handleOnClick(ele)
                })
                this.state.temp = {
                    ele: ele,
                    selector : 'list'
                }
                if (this.#getParrents().length > 0) {
                    const _list = this.#getParrents()[0]
                    const def = eval('({' + _list.getAttribute('def').replaceAll('; ', ';').replaceAll(';', ',') + '})')
                    const param = new URLSearchParams(window.location.search).get(Boolean(_list.getAttribute('param')) ? _list.getAttribute('param') : def.param)
                    const value = ele.getAttribute('value') ? ele.getAttribute('value') : def.value
                    if (param) {
                        if (param == value) {
                            ele.classList.add('active')
                        }
                    } else {
                        if (value == def.value) {
                            ele.classList.add('active')
                        }
                    }
                }
            }
        })
    }

    #ButtonSelection(){
        const btnSelection = document.querySelectorAll('button-selection')
        btnSelection.forEach(_selection=>{
            const btnAll = _selection.querySelectorAll('button')
            const arrActiveClass = _selection.getAttribute('classActive').split(' ')
            const _default = _selection.getAttribute('default') ? parseInt(_selection.getAttribute('default')) : 0
            if (!_selection.classList.contains('is-btn-selection')) {
                arrActiveClass.map(activeClass=>{
                    _selection.querySelectorAll('button')[_default].classList.add(activeClass)
                })
                _selection.querySelectorAll('button')[_default].click()
                _selection.classList.add('is-btn-selection')
            }
            btnAll.forEach(Btn=>{
                if (!Btn.classList.contains('btn-option')) {
                    Btn.classList.add('btn-option')
                    Btn.addEventListener('click', ()=>{
                        btnAll.forEach(optionMenu=>{
                            arrActiveClass.map(activeClass=>{
                                optionMenu.classList.remove(activeClass)
                            })
                        })
                        arrActiveClass.map(activeClass=>{
                            Btn.classList.add(activeClass)
                        })
                    })
                }
            })
        })
    }

    #ImgPreview(){
        const imgPres = document.querySelectorAll('img-pre')
        imgPres.forEach(imgPre=>{
            const sourceInput = document.querySelector(imgPre.getAttribute('target'))
            if(!sourceInput.classList.contains('pre-watching')){
                sourceInput.classList.add('pre-watching')
                sourceInput.addEventListener('change', ()=>{
                    document.querySelector('img[target="'+imgPre.getAttribute('target')+'"]').setAttribute('src', URL.createObjectURL(sourceInput.files[0]))
                    // imgPre.setAttribute('src', URL.createObjectURL(sourceInput.files[0]))
                })
                this.#_replaceTag(imgPre, 'img')
            }
        })
    }

    #_replaceTag(element, newTagName){
        var that = element
        console.log('replace!');
        var p = document.createElement(newTagName)
        element.getAttributeNames().reduce((acc, name) => {
            p.setAttribute(name, element.getAttribute(name))
        }, {})

        // move all elements in the other container.
        while(that.firstChild) {
            p.appendChild(that.firstChild)
        }
        that.replaceWith(p)

    }

    #_handleOnClick(ele){
        layoutScripts({
            link: {
                data : ele.getAttribute('data'),
                title : ele.getAttribute('title'),
                url : ele.getAttribute('url'),
            },
            func : 'Link'
        })
        this.state.temp = {
            ele: ele,
            selector : 'list'
        }
        if (this.#getParrents().length > 0) {
            const _list = this.#getParrents()[0]
            _list.querySelectorAll('to').forEach(to_in_list=>{
                to_in_list.classList.remove('active')
            })
            ele.classList.add('active')
        }
    }

    #getParrents(){
        let elem = this.state.temp.ele
        let selector = this.state.temp.selector
        
        // Element.matches() polyfill
        if (!Element.prototype.matches) {
            Element.prototype.matches =
                Element.prototype.matchesSelector ||
                Element.prototype.mozMatchesSelector ||
                Element.prototype.msMatchesSelector ||
                Element.prototype.oMatchesSelector ||
                Element.prototype.webkitMatchesSelector ||
                function(s) {
                    var matches = (this.document || this.ownerDocument).querySelectorAll(s),
                        i = matches.length;
                    while (--i >= 0 && matches.item(i) !== this) {}
                    return i > -1;
                };
        }

        // Set up a parent array
        var parents = [];

        // Push each parent element to the array
        for ( ; elem && elem !== document; elem = elem.parentNode ) {
            if (selector) {
                if (elem.matches(selector)) {
                    parents.push(elem);
                }
                continue;
            }
            parents.push(elem);
        }

        // Return our parent array
        return parents;

    }

}
__ceMainTick__()