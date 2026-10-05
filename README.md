# 🎓 DGS Puanmatik - Dikey Geçiş Sınavı Puan Hesaplama Uygulaması

Önlisans öğrencilerinin Dikey Geçiş Sınavı (DGS) netlerini, Önlisans Başarı Puanını (ÖBP) ve alan türünü (Sayısal, Sözel, Eşit Ağırlık) dikkate alarak tahmini DGS puanını hesaplayan web tabanlı bir PHP uygulamasıdır.

---

## 🚀 Özellikler

* **4 Yanlış 1 Doğruyu Götürür:** Sayısal ve Sözel testleri için standart net hesaplama mantığı.
* **ÖBP Katsayı Kontrolü:** Önceki yıllarda DGS ile bir programa yerleşen adaylar için kırık ÖBP (0.3 katsayısı) ve standart ÖBP (0.6 katsayısı) hesaplama seçeneği.
* **Alan Bazlı Katsayılar:** Sayısal, Sözel ve Eşit Ağırlık puan türlerine göre özelleştirilmiş katsayı ve taban puan formülleri.
* **Form Doğrulama:** ÖBP alanının boş bırakılması durumunda kullanıcıyı uyaran hata kontrolü.

---

## 🛠️ Kullanılan Teknolojiler

* **HTML5:** Form ve tablo mimarisi
* **PHP:** Sunucu taraflı form işleme ve puan hesaplama mantığı

---

## 📐 Hesaplama Mantığı

Uygulama arka planda şu kuralları çalıştırır:

1. **Net Hesaplama:**  
   $$\text{Net} = \text{Doğru Sayısı} - \left(\frac{\text{Yanlış Sayısı}}{4}\right)$$

2. **ÖBP Katsayısı:**  
   * Yerleştirildi durumu: $\text{ÖBP} \times 0.3$  
   * Yerleştirilmedi durumu: $\text{ÖBP} \times 0.6$

3. **Puan Formülleri:**  
   * **Sayısal:** $(\text{Sayısal Net} \times 3) + (\text{Sözel Net} \times 0.6) + (\text{ÖBP} \times \text{Katsayı}) + 250$  
   * **Sözel:** $(\text{Sayısal Net} \times 0.6) + (\text{Sözel Net} \times 3) + (\text{ÖBP} \times \text{Katsayı}) + 120$  
   * **Eşit Ağırlık:** $(\text{Sayısal Net} \times 1.8) + (\text{Sözel Net} \times 1.8) + (\text{ÖBP} \times \text{Katsayı}) + 222$

---

## ⚙️ Kurulum ve Çalıştırma

 projenizi yerel ortamda çalıştırmak için aşağıdaki adımları takip edebilirsiniz:

 **Gereksinimler:**  
   XAMPP, WAMP veya Laragon gibi local sunucu yazılımlarından birinin kurulu olması gerekir.

