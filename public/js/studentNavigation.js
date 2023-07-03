        document.addEventListener('alpine:init', () => {
            Alpine.data('slider', () => ({
                
                // set initial tab
                tab: 0,
                
                // slider tabs
                tabs: [...document.querySelectorAll('nav[role=tablist] a[role=tab]')],
                
                init() {
                    // initialize main function
                    this.changeSlide()
                },
                
                // main function
                changeSlide() {
                    let timeInterval = this.$refs.slider.dataset.interval;
                    this.tabs[this.tab].setAttribute('class', 'active')
                    
                    // set interval to change slide
                    let startInterval = () => {
                        this.tab = (this.tab < this.tabs.length - 1)? this.tab + 1 : 0;
                        this.tabs.forEach( (tab)=> {
                            (this.tab == this.tabs.indexOf(tab)) ?  tab.setAttribute('class', 'active') : tab.removeAttribute('class') 
                        })
                    }
                    
                    // start interval to change slide
                    let slideInterval = setInterval(startInterval, timeInterval);
                    
                    // mouse over slider stops slide
                    this.$refs.slider.onmouseover = () => {
                        if (slideInterval) { 
                            clearInterval(slideInterval)
                            slideInterval = null;
                        }
                    }
                    
                    // mouse out slider starts again slide
                    this.$refs.slider.onmouseout = () => {
                        if (slideInterval === null) { 
                            slideInterval = setInterval(startInterval, timeInterval);
                        }
                    }
                    
                    // slider tabs click event 
                    this.tabs.forEach( (tab)=> {
                        tab.addEventListener('click', (e)=> {
                            e.preventDefault()
                            this.tab = this.tabs.indexOf(e.target)
                            this.tabs.forEach( (tab)=> {
                                (this.tab == this.tabs.indexOf(tab)) ?  tab.setAttribute('class', 'active') : tab.removeAttribute('class') 
                            }) 
                        })
                    })
                }
            }))
        })

        
