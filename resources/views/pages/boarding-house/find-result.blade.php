@extends('layout.app')

@section('content')
    <div id="Background"
        class="absolute top-0 w-full h-[570px] rounded-b-[75px] bg-[linear-gradient(180deg,#F2F9E6_0%,#D2EDE4_100%)]"></div>
    <div id="TopNav" class="relative flex items-center justify-between px-5 mt-[60px]">
        <a href="{{route('find-kos')}}"
            class="flex items-center justify-center w-12 h-12 overflow-hidden bg-white rounded-full shrink-0">
            <img src="assets/images/icons/arrow-left.svg" class="w-[28px] h-[28px]" alt="icon">
        </a>
        <p class="font-semibold">Search Results</p>
        <div class="w-12 dummy-btn"></div>
    </div>
    <div id="Header" class="relative flex items-center justify-between gap-2 px-5 mt-[18px]">
        <div class="flex flex-col gap-[6px]">
            <h1 class="font-bold text-[32px] leading-[48px]">Search Result</h1>
            <p class="text-ngekos-grey">{{$boardingHouses->count()}}</p>
        </div>
    </div>
    <section id="Result" class="relative flex flex-col gap-4 px-5 mt-5 mb-9">
        @foreach ($boardingHouses as $boardingHouse)
        <a href="details.html" class="card">
            <div class="flex rounded-[30px] border border-[#F1F2F6] p-4 gap-4 bg-white hover:border-[#91BF77] transition-all duration-300">
                <div class="flex w-[120px] h-[183px] shrink-0 rounded-[30px] bg-[#D9D9D9] overflow-hidden">
                    <img src="{{asset('storage/'. $boardingHouse->thumbnail)}}" class="object-cover w-full h-full" alt="icon">
                </div>
                <div class="flex flex-col w-full gap-3">
                    <h3 class="font-semibold text-lg leading-[27px] line-clamp-2 min-h-[54px]">{{$boardingHouse->name}}</h3>
                    <hr class="border-[#F1F2F6]">
                    <div class="flex items-center gap-[6px]">
                        <img src="assets/images/icons/location.svg" class="flex w-5 h-5 shrink-0" alt="icon">
                        <p class="text-sm text-ngekos-grey">{{$boardingHouse->city->name}}</p>
                    </div>
                    <div class="flex items-center gap-[6px]">
                        <img src="assets/images/icons/profile-2user.svg" class="flex w-5 h-5 shrink-0" alt="icon">
                        <p class="text-sm text-ngekos-grey">4 People</p>
                    </div>
                    <hr class="border-[#F1F2F6]">
                    <p class="text-lg font-semibold text-ngekos-orange">Rp
                        {{ number_format($boardingHouse->price, 0, ',', '.') }}
                        <span class="text-sm font-normal text-ngekos-grey">/bulan</span></p>
                </div>
            </div>
        </a>
        @endforeach
    </section>
@endsection
