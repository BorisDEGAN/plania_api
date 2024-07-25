import { GoogleGenerativeAI } from '@google/generative-ai'

const API_KEY = 'AIzaSyARfvPHvZnMdhVXJ95uMltbvdUAJydF2-M'

export const genAI = new GoogleGenerativeAI(API_KEY)

export const gemini = await genAI.getGenerativeModel({
  model: 'gemini-1.5-flash',
  generationConfig: { responseMimeType: 'application/json' },
})
