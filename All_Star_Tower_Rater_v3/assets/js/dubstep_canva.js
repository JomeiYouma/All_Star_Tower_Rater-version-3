//========================== Easter Egg - En développement ==========================

navigator.mediaDevices.getUserMedia({ audio: true }).then(stream => {
    const audioCtx = new AudioContext();
    const source = audioCtx.createMediaStreamSource(stream);
    const analyser = audioCtx.createAnalyser();
    analyser.fftSize = 512;
  
    const dataArray = new Uint8Array(analyser.frequencyBinCount);
    source.connect(analyser);
  
    const originalData2 = [...myChart.data.datasets[1].data];
  
    function update() {
      analyser.getByteFrequencyData(dataArray);
      const volume = dataArray.reduce((a, b) => a + b, 0) / dataArray.length;
  
      // Dataset 1 animation
      const mappedDuration = Math.max(100, 2000 - volume * 10);
      const colorValue1 = Math.min(255, volume * 7);
      const pointSize1 = Math.min(10, volume / 4 + 2);
      const tensionValue = volume / 15;
  
      const dataset1 = myChart.data.datasets[0];
      dataset1.borderColor = `rgb(${colorValue1}, ${255 - colorValue1}, 150)`;
      dataset1.pointBackgroundColor = dataset1.borderColor;
      dataset1.pointRadius = pointSize1;
      dataset1.tension = tensionValue;
  
      //  Dataset 2 animation
      const dataset2 = myChart.data.datasets[1];
      const colorValue2 = Math.min(255, volume * 5);
      const red = 200 - colorValue2;
      const blue = colorValue2 + 55;
      const green = 180 + Math.sin(Date.now() / 400) * 60;
  
      dataset2.borderColor = `rgb(${red}, ${green}, ${blue})`;
      dataset2.pointBackgroundColor = dataset2.borderColor;
      dataset2.pointRadius = originalData2.map((_, i) => {
        return 3 + Math.sin(Date.now() / 200 + i * 2) * (volume / 10);
      });
  
      dataset2.data = originalData2.map((val, i) => {
        const time = Date.now() / 120 + i * 3;
        const wiggle = Math.cos(time) * (volume * 2.8) + Math.sin(time * 0.5) * (volume / 1.8);
        return Math.max(0, val + wiggle);
      });
  
      myChart.options.animations.tension.duration = mappedDuration;
      myChart.update('none');
  
      requestAnimationFrame(update);
    }
  
    update();
  }).catch(err => {
    console.error("Erreur micro :", err);
  });