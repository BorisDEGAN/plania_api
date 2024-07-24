import { GoogleGenerativeAI } from '@google/generative-ai'

export default class GeminiService {
  genAI: any
  model: any
  projectData: any
  constructor() {
    const API_KEY = 'AIzaSyARfvPHvZnMdhVXJ95uMltbvdUAJydF2-M'

    this.genAI = new GoogleGenerativeAI(API_KEY)

    this.model = this.genAI.getGenerativeModel({
      model: 'gemini-1.5-pro',
      generationConfig: { responseMimeType: 'application/json' },
    })
  }

  async generate(text: string) {
    const result = await this.model.generateContent(text)
    const response = await result.response
    return response.text()
  }
}
