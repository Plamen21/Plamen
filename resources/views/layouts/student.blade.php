@section('content')
    <main class="container">
        <section x-data="slider()">
            <article x-ref="slider" data-interval="6000">

                <nav role="tablist">
                    <ul>
                        <li><a href="#" role="tab">First</a></li>
                        <li><a href="#" role="tab">Second</a></li>
                        <li><a href="#" role="tab">Third</a></li>
                        <li><a href="#" role="tab">Fourth</a></li>
                    </ul>
                </nav>

                <div class="grid">
                    <div x-show="tab == 0" x-cloak>
                        <h4>First content</h4>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Totam quo odit veritatis distinctio
                            mollitia error, delectus minima exercitationem vitae minus maiores sapiente praesentium ut velit
                            impedit beatae commodi soluta magni!</p>
                    </div>
                    <div x-show="tab == 1" x-cloak>
                        <h4>Second content</h4>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Totam quo odit veritatis distinctio
                            mollitia error, delectus minima exercitationem vitae minus maiores sapiente praesentium ut velit
                            impedit beatae commodi soluta magni!</p>
                    </div>
                    <div x-show="tab == 2" x-cloak>
                        <h4>Third content</h4>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Totam quo odit veritatis distinctio
                            mollitia error, delectus minima exercitationem vitae minus maiores sapiente praesentium ut velit
                            impedit beatae commodi soluta magni!</p>
                    </div>
                    <div x-show="tab == 3" x-cloak>
                        <h4>Fourth content</h4>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Totam quo odit veritatis distinctio
                            mollitia error, delectus minima exercitationem vitae minus maiores sapiente praesentium ut velit
                            impedit beatae commodi soluta magni!</p>
                    </div>
                </div>

            </article>
        </section>
    </main>
@endsection
