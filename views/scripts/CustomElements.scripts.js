const __main__ = () =>{
    const ce = new CustomElements();
    ce.state.script.To();
    setTimeout(__main__, 1)
}

class CustomElements{
    constructor(props) {
        this.state = {
            props : props,
            temp : {},
            script : {
                To : ()=>this.#To(),
            }
        }
    }

    #To(){
        document.querySelectorAll('to').forEach(ele=>{
            if (!ele.classList.contains('is-link')) {
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
                ele.classList.add('is-link')
            }
        })
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
__main__()