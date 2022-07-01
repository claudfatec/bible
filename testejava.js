function displayGreeting(name, salutation='Hello') {
    console.log(`${salutation}, ${name}`);
  }
  displayGreeting('Christopher');
  // displays "Hello, Christopher"
  
  displayGreeting('Christopher', 'Hi');
  // displays "Hi, Christopher"