
<footer class="footer-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <div class="footer-widget">
                        <div class="footer-logo">
                            <a href="index.html">
                                <img src="{{ URL::asset($aplikasi->file_logo->url_stream)??'' }}" height="60px" alt="logo">
                            </a>
                        </div>
                        <p>Website Resmi {{$aplikasi->nama.' '.$aplikasi->daerah}}</p>
                        <div class="footer-social">
                            <a href="{!!($kontak->filterkontak('facebook')->link ?? '')!!}" target="_blank"><i class='bx bxl-facebook'></i></a>
                            <a href="{!!($kontak->filterkontak('twitter')->link ?? '')!!}" target="_blank"><i class='bx bxl-twitter'></i></a>
                            <a href="{!!($kontak->filterkontak('instagram')->link ?? '')!!}" target="_blank"><i class='bx bxl-instagram'></i></a>
                            <a href="{!!($kontak->filterkontak('youtube')->link ?? '')!!}" target="_blank"><i class='bx bxl-youtube'></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="footer-widget pl-60">
                        <h3>Link Terkait</h3>
                        <ul>
                            <li>
                                <a href="http://spbe.go.id">
                                    <i class='bx bx-chevrons-right bx-tada'></i>
                                    spbe.go.id
                                </a>
                            </li>
                            <li>
                                <a href="https://spbe.menpan.go.id">
                                    <i class='bx bx-chevrons-right bx-tada'></i>
                                    spbe.menpan.go.id
                                </a>
                            </li>
                            <li>
                                <a href="https://kominfo.go.id">
                                    <i class='bx bx-chevrons-right bx-tada'></i>
                                    kominfo.go.id
                                </a>
                            </li>
                            <li>
                                <a href="https://diskominfotik.bengkaliskab.go.id">
                                    <i class='bx bx-chevrons-right bx-tada'></i>
                                    diskominfotik.bengkaliskab.go.id
                                </a>
                            </li>
                            <li>
                                <a href="https://bengkaliskab.go.id">
                                    <i class='bx bx-chevrons-right bx-tada'></i>
                                    bengkaliskab.go.id
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
                                {!!($kontak->filterkontak('telp')->isi ?? '')!!}
                                </a>
                            </li>
                            <li>
                                <span>
                                    <i class='bx bxs-envelope'></i>
                                    Email:
                                </span>
                                <a href="#">
                                    {!!($kontak->filterkontak('email')->link ?? '')!!}
                                </a>
                            </li>
                            <li>
                                <span>
                                    <i class='bx bx-location-plus'></i>
                                    Address:
                                </span>
                                <a href="#">
                                    {!!($kontak->filterkontak('alamat')->isi ?? '')!!}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>