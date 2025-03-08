# 🌤️ Hava Durumu Uygulaması

Modern ve kullanıcı dostu bir hava durumu uygulaması. WeatherAPI.com servisi kullanılarak geliştirilmiştir.

## 🌐 Canlı Demo

Uygulamayı canlı olarak görmek için: [Hava Durumu App](https://darkmirrorq.github.io/hava-durumu/)

## ✨ Özellikler

- 📅 7 günlük hava durumu tahmini
- ⏰ Saatlik hava durumu detayları
- 📍 Konum bazlı otomatik hava durumu
- 🔍 Şehir arama özelliği
- 📱 Mobil uyumlu tasarım
- 🌈 Modern ve kullanıcı dostu arayüz

### 📊 Detaylı Bilgiler

- Sıcaklık değerleri (°C)
- Rüzgar hızı (km/s)
- Yağış olasılığı (%)
- Yağış miktarı (mm)
- Nem oranı (%)

## 🛠️ Kullanılan Teknolojiler

- HTML5
- CSS3 (Modern UI/UX)
- JavaScript (Fetch API)
- PHP
- WeatherAPI.com API

## ⚙️ Kurulum

1. Projeyi klonlayın:

```bash
git clone https://github.com/DarkMirrorq/hava-durumu.git
```

2. [WeatherAPI.com](https://www.weatherapi.com)'dan ücretsiz API anahtarı alın.

3. `.env` dosyası oluşturun:

```bash
WEATHER_API_KEY=SİZİN_API_ANAHTARINIZ
```

4. Projeyi bir PHP sunucusunda çalıştırın (örn. XAMPP, WAMP).

## 🚀 Kendi GitHub Pages Sayfanızda Yayınlama

1. Projeyi fork edin
2. Repository ayarlarından GitHub Pages'i aktifleştirin:
   - Settings > Pages
   - Source: Deploy from a branch
   - Branch: master
   - Save
3. Birkaç dakika içinde siteniz yayında olacak
4. API anahtarınızı güvenli bir şekilde yönetmek için:
   - Repository Settings > Secrets and variables > Actions
   - "New repository secret" tıklayın
   - Name: WEATHER_API_KEY
   - Value: API anahtarınız
   - Add secret

## 💡 Kullanım

1. Şehir ismi girerek arama yapabilirsiniz
2. "Konumumu Kullan" butonu ile otomatik konum tespiti yapabilirsiniz
3. 7 günlük hava durumu tahminlerini görebilirsiniz
4. Günlük detaylı hava durumu bilgilerini inceleyebilirsiniz
5. Saatlik hava durumu tahminlerini görebilirsiniz

## 🤝 Katkıda Bulunma

1. Bu projeyi fork edin
2. Yeni bir branch oluşturun (`git checkout -b yeni-ozellik`)
3. Değişikliklerinizi commit edin (`git commit -m 'Yeni özellik eklendi'`)
4. Branch'inizi push edin (`git push origin yeni-ozellik`)
5. Pull Request oluşturun

## 🔒 Güvenlik

- API anahtarınızı asla doğrudan kodunuzda paylaşmayın
- Her zaman `.env` dosyası kullanın
- `.env` dosyasını `.gitignore` listesine ekleyin
- GitHub Pages için repository secrets kullanın

## 📝 Lisans

Bu proje GNU General Public License v3.0 ile lisanslanmıştır. Detaylar için [LICENSE](LICENSE) dosyasına bakın.

## 👨‍💻 Geliştirici

[DarkMirrorq](https://github.com/DarkMirrorq)

## 📞 İletişim

Herhangi bir soru veya öneriniz için:

- GitHub Issues üzerinden bildirim oluşturabilirsiniz
- Pull Request gönderebilirsiniz
- Repository'yi yıldızlayarak destek olabilirsiniz
