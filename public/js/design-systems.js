/**
 * NexaGTM Design Systems Engine — Liquid Glass Visual Layer & 3D Spatial Physics
 * Site-wide default: Liquid Glass. Other styles remain defined in CSS for
 * targeted component use.
 */

(function () {
  'use strict';

  // 1. Initial State
  const defaultMode = 'liquid-glass';

  document.documentElement.setAttribute('data-design-mode', defaultMode);

  // 2. Spatial UI Tilt Calculation
  function setupSpatialTilt() {
    const cards = document.querySelectorAll('.spatial-card, .liquid-glass-card, [data-spatial="true"]');
    cards.forEach((card) => {
      card.addEventListener('mousemove', handleCardMouseMove);
      card.addEventListener('mouseleave', handleCardMouseLeave);
    });
  }

  function handleCardMouseMove(e) {
    const card = e.currentTarget;
    const rect = card.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;

    const centerX = rect.width / 2;
    const centerY = rect.height / 2;

    // Calculate rotation (-12deg to +12deg max)
    const rotateX = ((y - centerY) / centerY) * -10;
    const rotateY = ((x - centerX) / centerX) * 10;

    card.style.setProperty('--tilt-x', `${rotateX.toFixed(2)}deg`);
    card.style.setProperty('--tilt-y', `${rotateY.toFixed(2)}deg`);
    card.style.setProperty('--mouse-x', `${x.toFixed(1)}px`);
    card.style.setProperty('--mouse-y', `${y.toFixed(1)}px`);
  }

  function handleCardMouseLeave(e) {
    const card = e.currentTarget;
    card.style.setProperty('--tilt-x', `0deg`);
    card.style.setProperty('--tilt-y', `0deg`);
    card.style.setProperty('--mouse-x', `50%`);
    card.style.setProperty('--mouse-y', `50%`);
  }

  // 3. Hardware Skeuomorphic Toggles (e.g. Monthly/Quarterly Pricing toggle)
  function setupHardwareToggles() {
    const toggleTracks = document.querySelectorAll('.skeuo-toggle-track');
    toggleTracks.forEach((track) => {
      track.addEventListener('click', () => {
        const isActive = track.classList.toggle('active');
        const targetId = track.getAttribute('data-target');
        if (targetId) {
          const targetEl = document.getElementById(targetId);
          if (targetEl) {
            targetEl.dispatchEvent(new CustomEvent('toggle-change', { detail: { active: isActive } }));
          }
        }
      });
    });
  }

  // Initialize on DOM Ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
      setupSpatialTilt();
      setupHardwareToggles();
    });
  } else {
    setupSpatialTilt();
    setupHardwareToggles();
  }
})();