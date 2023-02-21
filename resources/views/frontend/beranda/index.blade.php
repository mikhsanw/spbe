@extends('layouts.frontend.main')
@section('title', 'Beranda')
@section('img', ($aplikasi->file_logo?(asset($aplikasi->file_logo->url_stream)):''))
@section('content')
<div class="banner-section">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="banner-content text-center">
                        <p>Find Jobs, Employment & Career Opportunities</p>
                        <h1>Drop Resume & Get Your Desire Job!</h1>
                        <form class="banner-form">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Keyword:</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="Job Title">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail2">Location:</label>
                                        <input type="text" class="form-control" id="exampleInputEmail2"
                                            placeholder="City or State">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="find-btn">
                                        Find A Job
                                        <i class='bx bx-search'></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <ul class="keyword">
                            <li>Trending Keywords:</li>
                            <li><a href="#">Automotive,</a></li>
                            <li><a href="#">Education,</a></li>
                            <li><a href="#">Health</a></li>
                            <li>and</li>
                            <li><a href="#">Care Engineering</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="categories-section pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <h2>Choose Your Category</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Quis ipsum suspendisse ultrices.</p>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="job-list.html">
                        <div class="category-card">
                            <i class='flaticon-accounting'></i>
                            <h3>Accountancy</h3>
                            <p>301 open position</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="job-list.html">
                        <div class="category-card">
                            <i class='flaticon-graduation-cap'></i>
                            <h3>Education</h3>
                            <p>210 open position</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="job-list.html">
                        <div class="category-card">
                            <i class='flaticon-wrench-and-screwdriver-in-cross'></i>
                            <h3>Automotive Jobs</h3>
                            <p>281 open position</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="job-list.html">
                        <div class="category-card">
                            <i class='flaticon-consultation'></i>
                            <h3>Business</h3>
                            <p>122 open position</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="job-list.html">
                        <div class="category-card">
                            <i class='flaticon-heart'></i>
                            <h3>Health Care</h3>
                            <p>335 open position</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3  col-md-4 col-sm-6">
                    <a href="job-list.html">
                        <div class="category-card">
                            <i class='flaticon-computer'></i>
                            <h3>IT & Agency</h3>
                            <p>401 open position</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3  col-md-4 col-sm-6 offset-md-2 offset-lg-0">
                    <a href="job-list.html">
                        <div class="category-card">
                            <i class='flaticon-worker'></i>
                            <h3>Engineering</h3>
                            <p>100 open position</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <a href="job-list.html">
                        <div class="category-card">
                            <i class='flaticon-auction'></i>
                            <h3>Legal</h3>
                            <p>201 open position</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
