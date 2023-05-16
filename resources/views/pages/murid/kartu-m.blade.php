    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style>
          .card {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
                grid-gap: 20px;
            }
            
          .kartu {
            page-break-inside: avoid;
            break-inside: avoid-column;
            display: inline-block;
            vertical-align: top;            
            height: 200px;
            width: 90px;
            border: 2px #black;
            border-style: double;
            box-shadow: 1px 1px 3px #ccc;
            margin-bottom: 15px;
            padding: 20px;            
            text-align: center;
            font-family: Sans-serif;
            font-size: 5px;
          } 
          
          .name {
            font-weight: bold;
            font-size: 7px;
            margin-bottom: 5px;
          }

          .kelas {
            font-weight: bold;
            font-size: 5px;
            margin-bottom: 5px;
          }
          .photo {      
            margin-bottom: 10px;            
          }

          .nis {
            margin-bottom: 10px;
          }

          .qr-code {
            width: 100%;
            height: 100%;
            margin: 10px auto;
            margin-bottom: 0px;
          }
        </style>
        <div class="card"> 
          @foreach ($data as $k)       
          <div class="kartu">
            <div class="photo">
              <img src="{{ public_path('/img/logo-sekolah.png') }}" class="img-fluid" width="60px" height="60px">
            </div>          
            <div class="name">
              {{ $k['nama'] }}
            </div>
            <div class="kelas">
              {{ $k['kelas'] }}
            </div>
            <div class="nis">
              NIS: {{ $k['nis'] }}
            </div>
            <div class="qr-code">
                <img src="data:image/png;base64, {{ base64_encode($k['qr']) }} ">
            </div>
          </div>
          @endforeach
        </div>     
        
        
      