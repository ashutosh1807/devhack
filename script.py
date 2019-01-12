#!/usr/bin/env python3
from googletrans import Translator
import sys
translator = Translator()
del sys.argv[0]
translation = translator.translate(" ".join(sys.argv), dest='hi')
print(translation.text)