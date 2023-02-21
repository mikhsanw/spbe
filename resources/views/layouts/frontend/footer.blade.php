
<footer class="footer-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget">
                        <div class="footer-logo">
                            <a href="index.html">
                                <img src="{{ URL::asset($aplikasi->file_logo->url_stream)??'' }}" height="80px" alt="logo">
                            </a>
                        </div>
                        <p>Website Resmi {{$aplikasi->nama.' '.$aplikasi->daerah}}</p>
                        <div class="footer-social">
                            <a href="#" target="_blank"><i class='bx bxl-facebook'></i></a>
                            <a href="#" target="_blank"><i class='bx bxl-twitter'></i></a>
                            <a href="#" target="_blank"><i class='bx bxl-pinterest-alt'></i></a>
                            <a href="#" target="_blank"><i class='bx bxl-linkedin'></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget pl-60">
                        <h3>For Candidate</h3>
                        <ul>
                            <li>
                                <a href="job-grid.html">
                                    <i class='bx bx-chevrons-right bx-tada'></i>
                                    Browse Jobs
                                </a>
                            </li>
                            <li>
                                <a href="account.html">
                                    <i class='bx bx-chevrons-right bx-tada'></i>
                                    Account
                                </a>
                            </li>
                            <li>
                                <a href="catagories.html">
                                    <i class='bx bx-chevrons-right bx-tada'></i>
                                    Browse Categories
                                </a>
                            </li>
                            <li>
                                <a href="resume.html">
                                    <i class='bx bx-chevrons-right bx-tada'></i>
                                    Resume
                                </a>
                            </li>
                            <li>
                                <a href="job-list.html">
                                    <i class='bx bx-chevrons-right bx-tada'></i>
                                    Job List
                                </a>
                            </li>
                            <li>
                                <a href="sign-up.html">
                                    <i class='bx bx-chevrons-right bx-tada'></i>
                                    Sign Up
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget pl-60">
                        <h3>Quick Links</h3>
                        <ul>
                            <li>
                                <a href="index.html">
                                    <i class='bx bx-chevrons-right bx-tada'></i>
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="about.html">
                                    <i class='bx bx-chevrons-right bx-tada'></i>
                                    About
                                </a>
                            </li>
                            <li>
                                <a href="faq.html">
                                    <i class='bx bx-chevrons-right bx-tada'></i>
                                    FAQ
                                </a>
                            </li>
                            <li>
                                <a href="pricing.html">
                                    <i class='bx bx-chevrons-right bx-tada'></i>
                                    Pricing
                                </a>
                            </li>
                            <li>
                                <a href="privacy.html">
                                    <i class='bx bx-chevrons-right bx-tada'></i>
                                    Privacy
                                </a>
                            </li>
                            <li>
                                <a href="contact.html">
                                    <i class='bx bx-chevrons-right bx-tada'></i>
                                    Contact
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget footer-info">
                        <h3>Information</h3>
                        <ul>
                            <li>
                                <span>
                                    <i class='bx bxs-phone'></i>
                                    Phone:
                                </span>
                                <a href="#">
                                    {!!($kontak->telp?$kontak->filterkontak('telp')->isi : '')!!}
                                </a>
                            </li>
                            <li>
                                <span>
                                    <i class='bx bxs-envelope'></i>
                                    Email:
                                </span>
                                <a
                                    href="#">
                                    <span >{!!($kontak->email?$kontak->filterkontak('email')->isi : '')!!}</span>
                                </a>
                            </li>
                            <li>
                                <span>
                                    <i class='bx bx-location-plus'></i>
                                    Address:
                                </span>
                                {!!($kontak->alamat?$kontak->filterkontak('alamat')->isi:'')!!}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>