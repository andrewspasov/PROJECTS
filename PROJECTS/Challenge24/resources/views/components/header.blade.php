<header class="py-1">
    <div class="container">
        <nav class="navbar navbar-expand-md navbar-light">
            <a class="navbar-brand d-flex justify-content-sm-center" href="{{ route('home') }}"><img src="{{ asset('images/logo_footer_black.png') }}" style="width:50px" alt="" id="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-md-end" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item px-1 px-lg-4 pt-md-3 pt-lg-0">
                        <a class="nav-link text-center d-flex flex-md-column justify-content-md-center" href="https://brainster.co/full-stack/">
                            <span class="px-1">Академија за</span>
                            <span>Програмирање</span>
                        </a>
                    </li>
                    <li class="nav-item px-1 px-lg-4 pt-md-2 pt-lg-0">
                        <a class="nav-link text-center d-flex flex-md-column justify-content-md-center" href="https://brainster.co/marketing/">
                            <span class="px-1">Академија за</span>
                            <span>Маркетинг</span>
                        </a>
                    </li>
                    <li class="nav-item px-1 px-lg-4 align-self-md-center">
                        <a class="nav-link text-md-center px-1" href="https://brainster.co/graphic-design/">
                            Академија за Дизајн
                        </a>
                    </li>
                    <li class="nav-item px-1 px-lg-4 align-self-md-center">
                        <a class="nav-link text-md-center px-1" href="https://blog.brainster.co/">Блог</a>
                    </li>
                    <li class="nav-item px-1 px-lg-4 p-md-0 m-md-0 align-self-md-center">
                        <a class="nav-link text-center d-flex flex-md-column justify-content-md-center" href="#" data-toggle="modal" data-target="#contactModal">
                            <span class="px-1">Вработи наши</span>
                            <span>студенти</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Contact Modal -->
        <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="contactModalLabel">Вработи наши студенти</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-secondary">Внесете Ваши информации за да стапиме во контакт:</p>
                        <!-- Contact Form -->
                        <form action="{{ route('send-contact') }}" method="POST" class="text-secondary">
                            @csrf
                            <div class="form-group py-1">
                                <label for="email" class="py-1">Е-Мејл</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group py-1">
                                <label for="phone" class="py-1">Телефон</label>
                                <input type="text" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="form-group py-1">
                                <label for="company" class="py-1">Компанија</label>
                                <input type="text" class="form-control" id="company" name="company" required>
                            </div>
                            <button type="submit" class="btn btn-lg btn-warning py-1 my-1 form-control">Испрати</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</header>